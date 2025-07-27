describe('Inscription utilisateur', () => {
    it('Un utilisateur peut s’inscrire', () => {
        cy.visit('http://localhost:8000/register');
        cy.get('input[name="name"]').type('Aya Test');
        cy.get('input[name="email"]').type('aya_test@example.com');
        cy.get('input[name="password"]').type('password');
        cy.get('input[name="password_confirmation"]').type('password');
        cy.get('form').submit();

        cy.url().should('include', '/login');
    });
});
