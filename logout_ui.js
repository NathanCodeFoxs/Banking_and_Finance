/* ===== SIDEBAR ===== */
function openSidebar() {
    const sidebar = document.getElementById("sidebar");
    const bg = document.getElementById("sidebarBg");
    if (!sidebar || !bg) return;

    sidebar.style.left = "0";
    bg.style.width = "100%";
}

function closeSidebar() {
    const sidebar = document.getElementById("sidebar");
    const bg = document.getElementById("sidebarBg");
    if (!sidebar || !bg) return;

    sidebar.style.left = "-280px";
    bg.style.width = "0";
}

/* ===== NAVIGATION ===== */
function goTo(url) {
    window.location.href = url;
}

/* ===== LOGOUT MODAL ===== */
function confirmLogout() {
    const modal = document.getElementById("logoutModal");
    if (modal) modal.style.display = "flex";
}

function closeLogout() {
    const modal = document.getElementById("logoutModal");
    if (modal) modal.style.display = "none";
}

function doLogout() {
    window.location.href = "PHP/logout.php";
}

/* ===== SECURITY: BLOCK BACK AFTER LOGOUT ===== */
(function () {
    history.pushState(null, "", location.href);
    window.addEventListener("popstate", function () {
        window.location.href = "Login.php";
    });
})();
