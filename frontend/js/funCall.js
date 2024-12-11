export async function callLambda(httpCode) {
const url = process.env.SECRET_URL;
const apiKey = process.env.SECRET_API_KEY;

const proxyUrl = `${url}/httpcodes/${httpCode}`;
    try {
        const response = await fetch(proxyUrl, {
            method: 'GET',
            headers: {
                'x-api-key': apiKey // Include API key in headers
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        console.log(data);
    } catch (error) {
        console.error('Error fetching data:', error.message);
    }
}
window.callLambda = callLambda;