const projecten = document.getElementById('projecten');

if(projecten){
    projecten.addEventListener('click', e => {
        if(e.target.className === 'btn btn-danger delete-project'){
            if(confirm('Are you sure you want to delete this?')){
                const id = e.target.getAttribute('data-id');

                fetch(`/admin/project/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}