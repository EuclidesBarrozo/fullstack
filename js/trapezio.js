document.getElementById('calculo').onsubmit = function () {
    var B = document.getElementById('BaseMaior').value;
    var b = document.getElementById('baseMenor').value;
    var h = document.getElementById('Altura').value;

    var At = ((parseFloat(B) + parseFloat(b)) * parseFloat(h)) / 2;

    document.getElementById('trapezio').value = At;
    return false;
};