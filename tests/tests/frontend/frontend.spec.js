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

test("Basic auth", async ({ page, browser }) => {
    await page.goto("http://localhost:3000/loginPage.html")
    await page.getByLabel("Username").fill("Neo")
    await page.getByLabel("Password").fill("redpill")
    await page.locator('#loginBtn').click();
    
    await page.goto("http://localhost:3000/loggedInPage.html")
    await expect(page).toHaveTitle("The Matrix");

});

test("Failed auth", async ({ page }) => {
  await page.goto("http://localhost:3000/loginPage.html")
  await page.getByLabel("Username").fill("Neo")
  await page.getByLabel("Password").fill("bluepill")
  await page.locator('#loginBtn').click();
  
  const errorMessage = page.locator('#demo')
  await expect(errorMessage).toHaveText("Please enter the correct user name and password");
});
