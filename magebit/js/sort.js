document.getElementById('sort').addEventListener('click', function() {
    var div1 = document.getElementById('table1');
    var div2 = document.getElementById('table2');

    if (div1.style.display === 'none') {
        div1.style.display = 'block';
        div2.style.display = 'none';
    } else {
        div1.style.display = 'none';
        div2.style.display = 'block';
    }

    if (div1.style.display === 'none') {
        document.getElementById('sort').innerText = 'Sort By Date';
    } else {
        document.getElementById('sort').innerText = 'Sort By Email';
    }
});
