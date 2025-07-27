describe('Admin assignation de tâche', () => {
  it('Admin peut se connecter et assigner une tâche', () => {
    cy.visit('http://localhost:8000/login');
    cy.get('input[name="email"]').type('admin@gmail.com');
    cy.get('input[name="password"]').type('password');
    cy.get('form').submit();

    cy.url().should('include', '/admin');

    
    cy.get('button').contains('Assigner une tâche').first().click();

  
    cy.get('.modal.show input[name="title"]').type('Tâche test Cypress');
    cy.get('.modal.show textarea[name="description"]').type('Cette tâche est ajoutée par test e2e');

   
    cy.get('.modal.show form').submit();

   
    cy.contains('Tâche assignée avec succès');
  });
});
