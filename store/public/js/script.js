imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}

document.getElementById('flexSwitchCheckChecked').addEventListener('change', function() {
  const additionalOptions = document.getElementById('additionalOptions');
  if (this.checked) {
    additionalOptions.style.display = 'none'; // Esconde as opções
  } else {
      additionalOptions.style.display = 'block'; // Mostra as opções

  }
});

// Verifica o estado inicial do switch ao carregar a página
window.addEventListener('load', function() {
  const switchElement = document.getElementById('flexSwitchCheckChecked');
  const additionalOptions = document.getElementById('additionalOptions');
  if (!switchElement.checked) {
      additionalOptions.style.display = 'none'; // Esconde as opções se o switch estiver desativado
  }
});

const switchElement = document.getElementById('flexSwitchCheckChecked');
const switchValueInput = document.getElementById('switchValue');


// Atualiza o valor do campo oculto quando o switch é alterado
switchElement.addEventListener('change', function() {
  switchValueInput.value = this.checked ? 1 : 0;
});

// Seleciona todos os radios com o nome "agerating"
const ageRatingRadios = document.querySelectorAll('input[name="agerating"]');

// Seleciona o campo oculto
const hiddenAgeRating = document.getElementById('switchValueAgeRating');

// Adiciona um evento de change a cada radio
ageRatingRadios.forEach(radio => {
  radio.addEventListener('change', function() {
      // Atualiza o valor do campo oculto com o valor do radio selecionado
      hiddenAgeRating.value = this.value;
  });
});
