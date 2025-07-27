import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    baseUrl: 'http://localhost:8000',  // <-- ici, pas dans setupNodeEvents
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
