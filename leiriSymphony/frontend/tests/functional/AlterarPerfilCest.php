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
        $I->fillField('Perfis[cidade]', 'Leiria2');
        $I->click('Guardar', '#guardar');
        $I->seeLink("Editar");
        $I->seeInField("Perfis[cidade]", "Leiria2");
    }
}
