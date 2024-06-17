function toggleOptional(hiddenText, shownText) {
    let optional = document.getElementById("memberium-optional-directions");
    let toggle = document.getElementById("toggle");
    if (optional.style.display === "block") {
        optional.style.display = "none";
        if(hiddenText) {
            toggle.innerText = hiddenText;
        } else {
            toggle.innerText = "Show Written Instructions";
        }
    } else {
        optional.style.display = "block";
        if(shownText) {
            toggle.innerText (1000) = shownText;
        } else {
            toggle.innerText = "Hide Written Instructions";
        }
    }
}