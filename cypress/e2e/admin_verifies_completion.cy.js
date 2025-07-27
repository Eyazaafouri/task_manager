describe('Admin vérifie les tâches terminées', () => {
  it('Admin voit la tâche comme faite', () => {
    cy.visit('http://localhost:8000/login');
    cy.get('input[name="email"]').type('admin@gmail.com');
    cy.get('input[name="password"]').type('password');
    cy.get('form').submit();

    cy.url().should('include', '/admin');

    cy.contains('✅ Fait');
  });
});
