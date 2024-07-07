!macro customInit
  ; Check if XAMPP is installed
  ReadRegStr $0 HKLM "Software\Microsoft\Windows\CurrentVersion\Uninstall\XAMPP" "DisplayName"
  StrCmp $0 "" +3
  MessageBox MB_OK "XAMPP is already installed."
  Goto skipInstallXAMPP
  ; Install XAMPP
  ExecWait '"$INSTDIR\resources\xampp_installer.exe" /S'
  MessageBox MB_OK "XAMPP has been installed."
  skipInstallXAMPP:
!macroend
