<?php

declare(strict_types=1);

namespace App\Console;

use App\Attribute\ConfirmEnvironmentAttribute;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[
    AsCommand(
        name: 'foo',
        description: 'Foo command',
    )
]
#[ConfirmEnvironmentAttribute('prod')]
final class FooCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->success("Hello Foo");

        return Command::SUCCESS;
    }
}
