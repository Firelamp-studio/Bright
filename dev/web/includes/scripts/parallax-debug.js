var debugInput = document.querySelector("input");
function updateDebugState() {
    document.body.classList.toggle('dBg', debugInput.checked);
}
debugInput.addEventListener("click", updateDebugState);
updateDebugState();
