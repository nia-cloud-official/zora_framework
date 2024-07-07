const { app, BrowserWindow } = require('electron');
const path = require('path');
const { exec, execFile } = require('child_process');
const fs = require('fs');

function isXAMPPInstalled() {
  const xamppControlScript = path.join('C:', 'xampp', 'xampp_start.exe');
  return fs.existsSync(xamppControlScript);
}

function installXAMPP(callback) {
  const xamppInstallerPath = path.join(__dirname, 'resources', 'xampp_installer.exe');

  execFile(xamppInstallerPath, ['/S'], (error, stdout, stderr) => {
    if (error) {
      console.error(`Error installing XAMPP: ${error}`);
      return;
    }
    console.log(`XAMPP installed: ${stdout}`);
    if (stderr) {
      console.error(`XAMPP stderr: ${stderr}`);
    }
    callback();
  });
}

function startXAMPP() {
  const xamppControlScript = path.join('C:', 'xampp', 'xampp_start.exe');

  exec(xamppControlScript, (error, stdout, stderr) => {
    if (error) {
      console.error(`Error starting XAMPP: ${error}`);
      return;
    }
    console.log(`XAMPP started: ${stdout}`);
    if (stderr) {
      console.error(`XAMPP stderr: ${stderr}`);
    }
  });
}

function stopXAMPP() {
  const xamppControlScript = path.join('C:', 'xampp', 'xampp_stop.exe');

  exec(xamppControlScript, (error, stdout, stderr) => {
    if (error) {
      console.error(`Error stopping XAMPP: ${error}`);
      return;
    }
    console.log(`XAMPP stopped: ${stdout}`);
    if (stderr) {
      console.error(`XAMPP stderr: ${stderr}`);
    }
  });
}

function createWindow() {
  const mainWindow = new BrowserWindow({
    width: 800,
    height: 600,
    webPreferences: {
      nodeIntegration: true,
      contextIsolation: false
    }
  });

  mainWindow.loadURL('http://localhost/zora-framework/public/'); // Point this to your PHP local server URL
  mainWindow.on('closed', function () {
    mainWindow = null;
  });
}

app.on('ready', () => {
  if (isXAMPPInstalled()) {
    startXAMPP();
    createWindow();
  } else {
    installXAMPP(() => {
      startXAMPP();
      createWindow();
    });
  }
});

app.on('window-all-closed', function () {
  if (process.platform !== 'darwin') {
    stopXAMPP();
    app.quit();
  }
});

app.on('activate', function () {
  if (BrowserWindow.getAllWindows().length === 0) {
    createWindow();
  }
});
