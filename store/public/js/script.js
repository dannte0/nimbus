// Função para pré-visualizar a imagem de capa
const imgInp = document.getElementById('imgInp');
const blah = document.getElementById('blah');

if (imgInp && blah) {
    imgInp.onchange = evt => {
        const [file] = imgInp.files;
        if (file) {
            blah.src = URL.createObjectURL(file);
        }
    };
}

document.getElementById("myForm").addEventListener("submit", function () {
    document.getElementById("switchValue").value = document.getElementById("flexSwitchCheckChecked").checked ? "1" : "0";
});

// Função para manipular o switch "isforkids"
const switchElement = document.getElementById('flexSwitchCheckChecked');
const additionalOptions = document.getElementById('additionalOptions');
const hiddenInput = document.getElementById('switchValue');

if (switchElement && additionalOptions && hiddenInput) {
    // Verifica o estado inicial do switch ao carregar a página
    window.addEventListener('load', function () {
        additionalOptions.style.display = switchElement.checked ? 'none' : 'block';
        hiddenInput.value = switchElement.checked ? '1' : '0';
    });

    // Adiciona um listener para alterações no switch
    switchElement.addEventListener('change', function () {
        additionalOptions.style.display = this.checked ? 'none' : 'block';
        hiddenInput.value = this.checked ? '1' : '0';
    });
}

// Função para manipular os radios de classificação etária
const ageRatingRadios = document.querySelectorAll('input[name="agerating"]');
const hiddenAgeRating = document.getElementById('switchValueAgeRating');

if (ageRatingRadios.length > 0 && hiddenAgeRating) {
    ageRatingRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            hiddenAgeRating.value = this.value;
        });
    });
}