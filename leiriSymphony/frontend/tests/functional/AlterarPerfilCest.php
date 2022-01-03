<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class AlterarPerfilCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryAlterarPerfil(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see("Recentemente adicionados");
        //Fazer Login
        $I->seeLink('Login');
        $I->click('Login');
        $I->see("Bem vindo de volta!
Por favor, faça o login");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Login', '.btn_3');
        //Ir para pagina de perfil
        $I->see("Recentemente adicionados");
        $I->seeLink("Perfil");
        $I->click("Perfil");
        $I->see("Nome:");
        //Editar perfil
        $I->seeLink("Editar");
        $I->click("Editar");
        $I->submitForm('#form-perfil', [
            'Perfis[nome]' => 'Administrador',
            'Perfis[endereco]' => 'Rua da Cidade',
            'Perfis[cidade]' => 'Leiria',
            'Perfis[codigopostal]' => '2410-000',
            'Perfis[telefone]' => '910000000',
            'Perfis[nif]' => '123456789',
        ]);
        $I->amOnPage('/perfis/index');
        $I->seeLink("Editar");
        $I->seeInField("Perfis[nome]", "Administrador");
        $I->seeInField("Perfis[endereco]", "Rua da Cidade");
        $I->seeInField("Perfis[cidade]", "Leiria");
        $I->seeInField("Perfis[codigopostal]", "2410-000");
        $I->seeInField("Perfis[telefone]", "910000000");
        $I->seeInField("Perfis[nif]", "123456789");
    }
}
