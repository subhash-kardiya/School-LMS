@echo on

REM Ensure we're on isha_changes
git checkout isha_changes
IF ERRORLEVEL 1 GOTO error

git add .

set /p commitMsg=Enter commit message: 

git commit -m "%commitMsg%"
IF ERRORLEVEL 1 GOTO error

git push origin isha_changes
IF ERRORLEVEL 1 GOTO error

REM Switch to master and merge
git checkout master
IF ERRORLEVEL 1 GOTO error

git merge isha_changes
IF ERRORLEVEL 1 GOTO error

git push origin master
IF ERRORLEVEL 1 GOTO error

git status
echo Done.
pause
exit /b 0

:error
echo.
echo ❌ An error occurred. Fix the issue and try again.
pause
exit /b 1
