function add_gold() {
    let $value = document.getElementById("gold-container").innerText;
    let $values = $value.split(' ');
    let $innerText = '';
    $innerText = (parseInt($values[0]) + 1) + ' glods';
    document.getElementById("gold-container").innerText = $innerText;
    document.getElementById("gold-form-input").setAttribute("value", parseInt($values[0]) + 1);
}

function remove_gold() {
    let $value = document.getElementById("gold-container").innerText;
    let $values = $value.split(' ');
    let $innerText = '';
    $innerText = (parseInt($values[0]) - 1) + ' glods';
    document.getElementById("gold-container").innerText = $innerText;
    document.getElementById("gold-form-input").setAttribute("value", parseInt($values[0]) - 1);
}