<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testContactFormDisplay(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Formulaire de contact');
        $this->assertSelectorExists('form button');
    }

    public function testContactFormSubmission(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $client->submitForm('Envoyer', [
            'form[firstName]' => 'John',
            'form[name]' => 'Doe',
            'form[message]' => 'Test message',
        ]);

        $this->assertResponseRedirects('/');
    }
}
