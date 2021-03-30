/*
var libros = [
  {
    titulo: "La Magia del Agua en el Lago Titicaca",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-La-Magia-del-Agua-en-el-Lago-Titicaca_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/la-magia-del-agua-en-el-lago-titicaca",
    autor: "2012",
    id: 1
  },
  {
    titulo: "La Amazonía",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-La-Amazonia_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/la-amazonia",
    autor: "2015",
    id: 2
  },
  {
    titulo: "El Señor de los Milagros",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-El-Senor-de-los-Milagros_1.jpg",
    url:"http://atkdigital.com/fondo-editorial/publicaciones/el-senor-de-los-milagros",
    autor: "2016",
    id: 3
  },
  {
    titulo: "Fiestas y Danzas del Perú",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-Fiestas-y-Danzas_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/fiestas-y-danzas-del-peru",
    autor: "2019",
    id: 4
  },
  {
    titulo: "Pachacamac",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-Pachacamac_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/pachacamac",
    autor: "2017",
    id: 5
  },
  {
    titulo: "Los Chachapoyas",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-Los-Chachapoyas_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/los-chachapoyas",
    autor: "2013",
    id: 6
  },
  {
    titulo: "San Pedro de Lima",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-San-Pedro-de-Lima_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/san-pedro-de-lima",
    autor: "2018",
    id: 7
  },
  {
    titulo: "Nuestra memoria puesta en valor",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-Nuestra-Memoria-Puesta-en-Valor_1.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/nuestra-memoria-puesta-en-valor",
    autor: "2014",
    id: 8
  },
  {
    titulo: "Arte Imperial Inca",
    imagen: "http://atkdigital.com/fondo-editorial/assets/images/PORTADA-Arte-Imperial-Inca.jpg",
    url: "http://atkdigital.com/fondo-editorial/publicaciones/arte-imperial-inca",
    autor: "2020",
    id: 9
  }
];
/**/

var seleccionados = [];
buscador.addEventListener("input", () => {
  seleccionados.length = 0;
  var fragment = document.createDocumentFragment();
  var elValor = buscador.value;
  if (elValor.length > 0) {
    seleccionados = libros.filter((libro) => libro.titulo.toLowerCase().includes(elValor.toLowerCase()));
    seleccionados.forEach((s) => {
      var lista = document.createElement("li");
      lista.innerHTML = '<a href="'+s.url+'"><div><img src="'+s.imagen+'"/><div class="datos"><p>"'+s.titulo+'"</p><span>'+s.autor+'</span></div></div></a>';
      fragment.appendChild(lista);
    });
    $('.lista-resultados').addClass('activo');
    resultado.innerHTML = "";
    resultado.appendChild(fragment);

  } else {
  	$('.lista-resultados').removeClass('activo');
    resultado.innerHTML = "";
    resultado.appendChild(fragment);
  }
});