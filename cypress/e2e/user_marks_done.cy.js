describe('Utilisateur marque une tâche', () => {
  it('Utilisateur se connecte et marque une tâche comme faite', () => {
    cy.visit('http://localhost:8000/login');
    cy.get('input[name="email"]').type('aya_test@example.com');
    cy.get('input[name="password"]').type('password');
    cy.get('form').submit();

    cy.url().should('include', '/user');

    cy.contains('Marquer comme fait').click();
    cy.contains('Tâche marquée comme terminée.');
  });
});
