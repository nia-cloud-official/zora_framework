document.addEventListener('DOMContentLoaded', () => {
    const testButtons = document.querySelectorAll('.run-test');
    
    testButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const dbType = event.target.dataset.dbtype;
            
            fetch(`/index.php?db=${dbType}`)
                .then(response => response.json())
                .then(data => {
                    const resultElement = document.getElementById(`result-${dbType}`);
                    resultElement.innerHTML = data.message;

                    // Update report section
                    const reportElement = document.getElementById('report');
                    reportElement.innerHTML = `<pre>${JSON.stringify(data.report, null, 2)}</pre>`;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
