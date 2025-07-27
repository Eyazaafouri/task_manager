describe('Affichage tâche après création via DB', () => {
  beforeEach(() => {
    cy.visit('/login');
    cy.get('input[name="email"]').type('admin@gmail.com');
    cy.get('input[name="password"]').type('password'); 
    cy.get('form').submit();
  });

  it('affiche la tâche insérée via seed', () => {
    // cy.artisan('db:seed --class=TestTaskSeeder'); 

    cy.visit('/admin'); 

    cy.contains('Tâche testée depuis Cypress').should('exist');
  });
});
