// #region: imports
// https://github.com/paulmillr/chokidar
import chokidar from "chokidar";
import { addFile, removeFile, changeFile } from "./wp.filehandlers.js";
// #endregion: imports
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: constants
const PLUGIN_FILE_TEMPLATE_NAME = "[plugin-name]";
const PLUGIN_NAME = process.env.PLUGIN_NAME;
const PLUGIN_DIST_PATH = process.env.PLUGIN_DIST_PATH;
const THEME_FILE_TEMPLATE_NAME = "[theme-name]";
const THEME_NAME = process.env.THEME_NAME;
const THEME_DIST_PATH = process.env.THEME_DIST_PATH;
// #endregion: constants
// --------------------------------------------------
// #region: variables
const chokidarOptions = { ignore, persistent: true };
const addEventsArray = ["add", "addDir"];
const removeEventsArray = ["unlink", "unlinkDir"];
const updateEventsArray = ["change"];
const pluginEvtOptions = {
  distDir: PLUGIN_DIST_PATH,
  name: PLUGIN_NAME,
  sourceDir: "src/plugin",
  template: PLUGIN_FILE_TEMPLATE_NAME,
};
const themeEvtOptions = {
  distDir: THEME_DIST_PATH,
  name: THEME_NAME,
  sourceDir: "src/theme",
  template: THEME_FILE_TEMPLATE_NAME,
};
const watchedDirsArray = [
  { path: "src/plugin", options: pluginEvtOptions },
  { path: "src/theme", options: themeEvtOptions },
];
// #endregion: variables
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: watchers
watchedDirsArray.forEach((dir) => {
  const watcher = chokidar.watch(dir.path, chokidarOptions);
  addEventsArray.forEach((event) => {
    watcher.on(event, addEvtHandler(dir.options));
  });
  removeEventsArray.forEach((event) => {
    watcher.on(event, removeEvtHandler(dir.options));
  });
  updateEventsArray.forEach((event) => {
    watcher.on(event, changeEvtHandler(dir.options));
  });
});
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// #region: event handlers
function addEvtHandler(options) {
  return (path) => addFile(path, options);
}

function changeEvtHandler(options) {
  return (path) => changeFile(path, options);
}

function removeEvtHandler(options) {
  return (path) => removeFile(path, options);
}
// #endregion: event handlers
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function ignore(path) {
  return path.includes(".DS_Store");
}
