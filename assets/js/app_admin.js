// function crearArrayDeObjetos(n) {
//   let array = [];
//   for (let i = 0; i <= n; i++) {
//       array.push({ id: i, number: i });
//   }
//   return array;
// }

// let numero = 9999;
// let data = crearArrayDeObjetos(numero);

const getNumber = document.querySelector(".get-number").innerHTML;

fetch(`../acciones/getnumbers.php?number=${getNumber}`, {
  method: "GET",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
})
  .then((response) => response.json())
  .then((data) => {
    const cuerpoTabla = document.querySelector("#cuerpo");
    const selectedKeysInput = document.getElementById("selectedKeys");
    let selectedKeys = [];

    // Define los números que ya están activos
    const numerosActivos = [66, 4, 5];

    let limite = 100;
    let paginaActiva = 1;
    let paginas = Math.ceil(data.length / limite);
    let maxPaginasVisibles = 10;

    const cargarProductos = () => {
      cuerpoTabla.innerHTML = "";
      let desde = (paginaActiva - 1) * limite;
      let hasta = paginaActiva * limite;
      let arreglo = data.slice(desde, hasta);

      arreglo.forEach((producto) => {
        const fila = document.createElement("div");
        fila.setAttribute("key", producto.number);
        fila.classList.add("n", "fila");
        fila.innerHTML = `<p>${producto.number}</p>`;
        if (selectedKeys.includes(producto.number)) {
          fila.classList.add("activa");
        }
        if (producto.status == "deactivate") {
          fila.classList.add("desactivada");
          fila.addEventListener("click", () =>
            seleccionarFila(fila, producto.number)
          );
        } else {
          fila.addEventListener("click", () =>
            seleccionarFila(fila, producto.number)
          );
        }
        cuerpoTabla.append(fila);
      });

      cargarItemPaginacion();
    };

    const cargarItemPaginacion = () => {
      document.querySelector("#items").innerHTML = "";
      let inicio = Math.max(
        2,
        paginaActiva - Math.floor(maxPaginasVisibles / 2)
      );
      let fin = Math.min(paginas - 1, inicio + maxPaginasVisibles - 2);

      if (fin - inicio < maxPaginasVisibles - 2) {
        inicio = Math.max(2, fin - maxPaginasVisibles + 2);
      }

      agregarItemPaginacion(1);

      for (let index = inicio; index <= fin; index++) {
        agregarItemPaginacion(index);
      }

      agregarItemPaginacion(paginas);
    };

    const agregarItemPaginacion = (index) => {
      const item = document.createElement("li");
      item.classList = `page-item ${paginaActiva == index ? "active" : ""}`;
      const enlace = `<button class="page-link" onclick="pasarPagina(${
        index - 1
      })">${index}</button>`;
      item.innerHTML = enlace;
      document.querySelector("#items").append(item);
    };

    const seleccionarFila = (fila, id) => {
      const index = selectedKeys.indexOf(id);
      if (index === -1) {
        selectedKeys.push(id);
        fila.classList.add("activa");
      } else {
        selectedKeys.splice(index, 1);
        fila.classList.remove("activa");
      }
      selectedKeysInput.value = selectedKeys.join(",");
    };

    window.pasarPagina = (pagina) => {
      paginaActiva = pagina + 1;
      cargarProductos();
    };

    window.nextPage = () => {
      if (paginaActiva < paginas) {
        paginaActiva++;
        cargarProductos();
      }
    };

    window.previusPage = () => {
      if (paginaActiva > 1) {
        paginaActiva--;
        cargarProductos();
      }
    };

    cargarProductos();
  })
  .catch((error) => console.error("Error:", error));

const buttons = document.querySelectorAll(".page-link");
buttons.forEach((element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault();
  });
});

const button = document.querySelector(".button-submit");

button.addEventListener("click", (e) => {
  e.preventDefault();
  const input = document.getElementById("selectedKeys").value;
  const dataToSend = { selectedKeys: input };
  console.log(JSON.stringify(dataToSend));
  fetch("../acciones/numbers.php", {
    method: "POST",
    body: JSON.stringify(dataToSend),
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
  }).then(location.reload());
});

