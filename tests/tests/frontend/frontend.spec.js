const { test, expect } = require('@playwright/test');

test('Home page', async ({ page }) => {
  await page.goto('http://localhost:3000/');
  await expect(page).toHaveTitle("fc572_index");
});

test('blog page', async ({ page }) => {
  await page.goto('http://localhost:3000/testYourAssumption.html');
  await expect(page).toHaveTitle("Test Your Assumptions");
});

test('map page', async ({ page }) => {
  await page.goto('http://localhost:3000/ProperMapPage.html');
  await expect(page).toHaveTitle("The Map Page");
});