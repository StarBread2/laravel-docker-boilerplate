document.addEventListener('DOMContentLoaded', () => {

    //#region CREATE
    const form = document.getElementById('projectForm');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            const res = await fetch('/api/projects', {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: formData
            });

            if (!res.ok) {
                const err = await res.json().catch(() => ({}));
                console.log(err);
                return alert(err.message);
            }

            alert('Project created successfully');
            location.reload();
        });
    }
    //#endregion


    //#region DELETE
    document.addEventListener('click', async (e) => {
        if (!e.target.classList.contains('delete-btn')) return;

        const row = e.target.closest('tr');
        const id = row.dataset.id;

        if (!confirm('Delete this project?')) return;

        const res = await fetch(`/api/projects/${id}`, {
            method: 'DELETE',
            headers: { 'Accept': 'application/json' }
        });

        if (!res.ok) {
            const err = await res.json().catch(() => ({}));
            alert(err.message || 'Delete failed');
            return;
        }

        row.remove();
        alert('Project deleted successfully');
    });
    //#endregion


    //#region EDIT
    const modal = document.getElementById('editModal');
    const closeBtn = document.getElementById('closeModal');

    // OPEN MODAL
    document.addEventListener('click', async (e) => {
        if (!e.target.classList.contains('edit-btn')) return;

        const id = e.target.dataset.id;

        try {
            const res = await fetch(`/api/projects/${id}`);
            const project = await res.json();

            document.getElementById('edit_id').value = project.id;
            document.getElementById('edit_title').value = project.title || '';
            document.getElementById('edit_description').value = project.description || '';
            document.getElementById('edit_status').value = project.status || 'Pending';
            document.getElementById('edit_due_date').value = project.due_date || '';

            modal.classList.remove('hidden');

        } catch (err) {
            console.error(err);
            alert('Failed to load project data');
        }
    });

    // CLOSE MODAL
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }

    modal?.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
    //#endregion


    //#region UPDATE
    const editForm = document.getElementById('editForm');

    if (editForm) {
        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const id = document.getElementById('edit_id').value;

            const data = {
                title: edit_title.value,
                description: edit_description.value,
                status: edit_status.value,
                due_date: edit_due_date.value
            };

            const res = await fetch(`/api/projects/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!res.ok) {
                const err = await res.json().catch(() => ({}));
                console.log(err);
                return alert(err.message);
            }

            alert('Project updated successfully');
            location.reload();
        });
    }
    //#endregion

});