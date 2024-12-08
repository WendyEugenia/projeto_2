// var form = document.getElementById('clienteForm');

// form.addEventListener('submit', function(event) {

//     event.preventDefault();
//     alert('Dados enviados com sucesso!');
//     form.reset();
// });

document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('index.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Alterado para processar JSON
    .then(data => {
        if (data.success) {
            document.getElementById('success-message').textContent = data.message;
            document.getElementById('success-message').style.color = 'green';
        } else {
            document.getElementById('success-message').textContent = 'Erro: ' + data.message;
            document.getElementById('success-message').style.color = 'red';
        }
        this.reset();
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('success-message').textContent = 'Erro ao enviar os dados';
        document.getElementById('success-message').style.color = 'red';
    });


    
});

