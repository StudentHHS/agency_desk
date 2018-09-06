const klanten = document.getElementById('klanten');

if(klanten){
    klanten.addEventListener('click', e => {
        if(e.target.className === 'btn btn-danger delete-klant'){
            if(confirm('Are you sure you want to delete this?')){
                const id = e.target.getAttribute('data-id');

                fetch(`/admin/klant/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}