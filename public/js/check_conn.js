function updateOnlineStatus() {
    document.getElementById("status").innerHTML =
        "<a class='nav-link text-success' aria-haspopup='true' aria-expanded='false'><i class='fas fa-wifi fa-2x'></i></a>";
}

function updateOfflineStatus() {
    document.getElementById("status").innerHTML =
        "<a class='nav-link' style='color:#ff8c00' aria-haspopup='true' aria-expanded='false'><i class='fas fa-wifi fa-2x'></i></a>";
}

window.addEventListener("online", updateOnlineStatus);
window.addEventListener("offline", updateOfflineStatus);
