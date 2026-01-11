// #region: imports
// https://esbuild.github.io/
import * as esbuild from "esbuild";
import { transform as lightningCSSTransform } from "lightningcss";
import fs from "fs/promises";
import path from "path";
// #endregion: imports
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: constants
const FILES_TO_TRANSFORM = [".css", ".js"];
const FILES_TO_IGNORE = ["style.css"];
// #endregion: constants
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: variables
const transformersObj = {
  ".css": transformCSS,
  ".js": transformJS,
};
// #endregion: variables
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: exported actions
export async function addFile(filePathString, optionsObj) {
  const { sourceDir } = optionsObj;
  const srcFileObj = parseSourceFile(filePathString, sourceDir);
  const distFileObj = parseDistFile(srcFileObj.relPath, optionsObj);
  if (await fileExists(distFileObj.destPathname)) return;
  await changeFile(filePathString, optionsObj, "ADD");
}
// --------------------------------------------------
export async function changeFile(
  filePathString,
  optionsObj,
  action = "CHANGE"
) {
  const { sourceDir } = optionsObj;
  const srcFileObj = parseSourceFile(filePathString, sourceDir);
  const distFileObj = parseDistFile(srcFileObj.relPath, optionsObj);
  try {
    // Make sure our destination directory exists:
    await fs.mkdir(distFileObj.parentDir, { recursive: true });
    // Copy our file or folder:
    if (srcFileObj.isFolder) {
      await fs.mkdir(distFileObj.destPathname, { recursive: true });
    } else {
      await fs.copyFile(srcFileObj.srcPath, distFileObj.destPathname);
      if (shouldTransformFile(srcFileObj.ext, srcFileObj.name)) {
        await transformersObj[srcFileObj.ext](distFileObj);
      }
    }
    console.log(
      `[${action}]: ${srcFileObj.srcPath} -> ${distFileObj.destPathname}`
    );
  } catch (error) {
    console.error("Error changing file:", error);
  }
}
// --------------------------------------------------
export async function removeFile(filePathString, optionsObj) {
  const { sourceDir } = optionsObj;
  const srcFileObj = parseSourceFile(filePathString, sourceDir);
  const distFileObj = parseDistFile(srcFileObj.relPath, optionsObj);
  try {
    await fs.rm(distFileObj.destPathname, { recursive: true, force: true });
    console.log(`[REMOVE]: ${distFileObj.destPathname}`);
  } catch (error) {
    console.error("Error removing file:", error);
  }
}
// --------------------------------------------------
// #endregion: exported actions
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: transformers
async function transformCSS(distFileObj) {
  const code = Buffer.from(await fs.readFile(distFileObj.destPathname, "utf8"));
  const result = lightningCSSTransform({
    code,
    minify: true,
  });
  await fs.writeFile(distFileObj.destPathname, result.code);
}

async function transformJS(distFileObj) {
  await esbuild.build({
    entryPoints: [distFileObj.destPathname],
    bundle: true,
    minify: true,
    outfile: distFileObj.destPathname,
    allowOverwrite: true,
  });
}
// #endregion: transformers
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: helpers
async function fileExists(path) {
  try {
    await fs.access(path);
    return true;
  } catch (err) {
    return false;
  }
}

function parseDistFile(srcFilePathString, { distDir, template, name }) {
  const destPathname = replaceTemplateName(
    path.join(distDir, srcFilePathString),
    template,
    name
  );
  const parentDir = path.dirname(destPathname);
  return {
    destPathname,
    name: path.basename(destPathname),
    parentDir,
  };
}

function parseSourceFile(filePathString, sourceDirString) {
  const ext = path.extname(filePathString);
  const relPath = filePathString.replace(sourceDirString, "");
  return {
    ext,
    isFolder: !ext,
    name: path.basename(filePathString),
    relPath,
    srcPath: filePathString,
  };
}

function replaceTemplateName(filePathString, templateString, nameString) {
  return filePathString.replace(templateString, nameString);
}

function shouldTransformFile(extension, filename) {
  return (
    FILES_TO_TRANSFORM.includes(extension) &&
    !FILES_TO_IGNORE.includes(filename)
  );
}
// #endregion: helpers
