
var actionsCellRowIndex = 4;
var actionsCell = document.querySelector("table tbody tr:nth-of-type(" + actionsCellRowIndex + ") td:last-of-type");
console.log("actionsCell", actionsCell);
var links = actionsCell.childNodes;
console.log("links", links);
var hasUpdate = false;
var hasDelete = false;

// var checkUpdateUrl = "file:///C:/admin/article/update.html?id=" + actionsCellRowIndex;
// var checkUpdateUrl = "file:///C:/admin/article/update.html?id=" + actionsCellRowIndex;

for (var i = 0; i < links.length; i++) {
    console.log('links[i].href', links[i].href)
    if (links[i].href === "http://basic/admin/article/update.html?id=" + actionsCellRowIndex) {
        hasUpdate = true;
    }
    if (links[i].href === "http://basic/admin/article/delete.html?id=" + actionsCellRowIndex) {
        hasDelete = true;
    }
}

console.log("hasUpdate", hasUpdate);
console.log("hasDelete", hasDelete);

if (!hasUpdate || !hasDelete) {
    console.log("It seems that there are no links for items editing or deleting in the table")
} else {
    console.log("HER!")
}