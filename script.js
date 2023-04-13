document.getElementById('ajouterEtiquette').addEventListener('click', function () {
    const container = document.getElementById('etiquettesContainer');
    const form = container.querySelector('.etiquetteForm').cloneNode(true);
    container.appendChild(form);
    const index = document.querySelectorAll('.etiquetteForm').length;
    resetInputNames(form, index);
    addRemoveButton(form);
});

function resetInputNames(form, index) {
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"]');
    inputs.forEach(input => {
        input.name = 'etiquette' + index + '_' + input.name;
    });
}

function addRemoveButton(form) {
    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.textContent = 'Supprimer cette étiquette';
    removeButton.classList.add('remove');
    removeButton.addEventListener('click', function() {
        form.remove();
    });
    form.appendChild(removeButton);
}

document.getElementById('genererZPL').addEventListener('click', async function () {
    const forms = document.querySelectorAll('.etiquetteForm');
    let combinedZPL = '';

    for (const form of forms) {
        const formData = new FormData();
        const inputs = form.querySelectorAll('input[type="text"], input[type="number"]');
        inputs.forEach(input => {
            formData.append(input.name.replace(/^etiquette\d+_/, ''), input.value);
        });
        formData.append('nombreRepetitions', form.querySelector('input[type="number"]').value);

        const response = await fetch('generate_zpl.php', {
            method: 'POST',
            body: formData
        });
        const zpl = await response.text();
        combinedZPL += zpl;
    }

    const blob = new Blob([combinedZPL], { type: 'application/octet-stream' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `etiquettes.zpl`;
    a.click();
});
