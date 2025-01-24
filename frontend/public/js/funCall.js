export async function callLambda(httpCode) {
const proxyUrl = `https://ur5pc7yr1j.execute-api.eu-west-2.amazonaws.com/dev/httpcodes/${httpCode}`;
    try {
        const response = await fetch(proxyUrl, {
            method: 'GET'
        });
        const statusSection = document.querySelector('main .status_section');
        if (response) {
            const data = await response.text();
            statusSection.innerHTML = `
                <p>Status Code: ${response.status}</p>
                <p>Response: ${data}</p>
            `;
        } else {
            statusSection.innerHTML = `<p>Failed Lambda function: ${error.message}</p>`;
        }
    } catch (error) {
        const statusSection = document.querySelector('main .status_section');
        statusSection.innerHTML = `<p>Failed to call Lambda function: ${error.message}</p>`;
    }
}
window.callLambda = callLambda;