@IF EXIST "%~dp0\node.exe" (
  "%~dp0\node.exe"  "%~dp0\node_modules\6to5\bin\6to5-node" %*
) ELSE (
  node  "%~dp0\node_modules\6to5\bin\6to5-node" %*
)