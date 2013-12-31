:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::   File name: CreateUploadArchive.bat
::      Author: I. Pavlinic
::        Date: December 2013
::
:: Description: This script produces a .tgz archive (using 7-Zip) of all files
::              in the current directory and its subdirectories, ignoring Git
::              files (./.git/). The archive can then be uploaded to a webserver
::              via FTP and extracted to deploy the website.
::
::       Notes: This script assumes that 7-Zip's command-line utility is part of
::              the system's PATH variable. The resulting archive is upload.tgz.
:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
@echo off
setlocal EnableExtensions EnableDelayedExpansion

:: Save the current directory
set currentDir=%~dp0

:: Delete the old filelist if it exists
if exist filelist.txt del filelist.txt

:: Delete the old archive if it exists
if exist upload.tgz del upload.tgz

:: Create filelist.txt, excluding Git files
:: Loop through the current directory and its subdirectories
echo Generating filelist.txt...
for /R %%f in (*) do ( 
        set relativePath=%%f
		REM For 7-Zip to function as intended, we need relative paths, not full ones
        set relativePath=!relativePath:%currentDir%=!
        REM Ignore Git files (within the .git folder)
        (echo "%%f" | find /I ".git" 1>NUL) || (
			REM Save the relative path to a temporary file which 7-Zip will create the
			REM archive from. Exclamation marks are required around the variable to use
			REM delayed expansion so that the variable is printed and not "Echo is OFF."
            echo !relativePath! >> filelist.txt
        )
)

:: Create upload archive using 7-Zip (assumes 7z.exe is in the system path)
echo Creating upload.tgz...
7z a -ttar -so upload.tar @filelist.txt | 7z a -si upload.tgz

:: Cleanup
del filelist.txt
endlocal
