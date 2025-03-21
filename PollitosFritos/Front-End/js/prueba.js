document.getElementById('departamento').addEventListener('change', function() {
    let puesto = document.getElementById('puesto');
    let ejemploPuesto = document.getElementById('ejemploPuesto');
    let departamento = this.value;

    let opciones = {
        'TI': {
            puestos: ['Programador', 'Soporte Redes'],
            ejemplo: 'Ejemplo: Desarrollador de software, Técnico en redes'
        },
        'RH': {
            puestos: ['Reclutador', 'Capacitador'],
            ejemplo: 'Ejemplo: Especialista en contratación, Instructor de personal'
        },
        'Contabilidad': {
            puestos: ['Contador', 'Auditor'],
            ejemplo: 'Ejemplo: Contador financiero, Auditor fiscal'
        }
    };

    // Limpiar opciones anteriores
    puesto.innerHTML = '<option value="">Selecciona...</option>';
    ejemploPuesto.textContent = ''; // Limpiar el ejemplo

    if (opciones[departamento]) {
        opciones[departamento].puestos.forEach(p => {
            let option = document.createElement('option');
            option.value = p;
            option.textContent = p;
            puesto.appendChild(option);
        });

        // Mostrar ejemplo debajo del select
        ejemploPuesto.textContent = opciones[departamento].ejemplo;
    }
});