
const { test, expect } = require('@playwright/test');

test('endpoint test post', async ({ page }) => {

    // Make actual API call
    const apiResponse = await page.request.post('http://localhost:3000/api/resource', {
        data: { key: 'value' }
    });

    // Assertions on the real API response
    expect(apiResponse.status()).toBe(201);
    expect(await apiResponse.text()).toBe('{\"id\":\"12345\"}');

    //deserialise json response
    const jsonResponse = await apiResponse.json();
    expect(jsonResponse.id).toBe('12345');
});

test('endpoint test get', async ({ page }) => {

    // Make actual API call
    const apiResponse = await page.request.get('http://localhost:3000/api/resource/12345');

    // Assertions on the real API response
    expect(apiResponse.status()).toBe(200);
    const jsonResponse = await apiResponse.json();
    expect(jsonResponse.id).toBe('12345');
    expect(jsonResponse.message).toBe('Sample data associated with ID 12345');
});

