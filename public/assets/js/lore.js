let last_chapter;

function submitform() {
    let cur_chap = document.getElementById('chapitre').value; // id du chapitre selectionné

    document.getElementById(cur_chap).setAttribute('style', 'display: flex');
    if (last_chapter !== undefined) document.getElementById(last_chapter).setAttribute('style', 'display: none');

    last_chapter = cur_chap;
}