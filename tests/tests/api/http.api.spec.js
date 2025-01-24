
const { test, expect } = require('@playwright/test');

const testCases = [
    { code: '418', expectedResponse: "I'm a Teapot" },
    { code: '200', expectedResponse: "OK" },
    { code: '404', expectedResponse: "Not Found" }
];

test.describe('HTTP Status Tests', () => {
    testCases.forEach(({ code, expectedResponse }) => {
        test(`Status code ${code} test`, async ({ page }) => {
            await page.goto('http://localhost:3000/httpResponsePage.html');
            await expect(page).toHaveTitle("HTTP Status Call");
            await page.locator('#httpcode').fill(code);
            await page.locator('.btnStyle').click();
            await expect(page.locator('.status_section'))
                .toHaveText(`Status Code: ${code} Response: ${expectedResponse}`);
        });
    });
});