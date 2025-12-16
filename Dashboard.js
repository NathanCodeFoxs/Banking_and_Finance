/* ===== SIDEBAR FUNCTIONS ===== */
function openSidebar() {
    document.getElementById("sidebarBg").style.width = "100%";
    document.getElementById("sidebar").style.left = "0";
}

function closeSidebar() {
    document.getElementById("sidebarBg").style.width = "0";
    document.getElementById("sidebar").style.left = "-280px";
}

/* ===== PAGE NAVIGATION ===== */
function goTo(page) {
    window.location.href = page;
}