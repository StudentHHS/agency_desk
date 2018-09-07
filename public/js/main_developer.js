const developers = document.getElementById('developers');

if(developers){
    developers.addEventListener('click', e => {
        if(e.target.className === 'btn btn-danger delete-developer'){
            if(confirm('Are you sure you want to delete this?')){
                const id = e.target.getAttribute('data-id');

                fetch(`/admin/developer/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}