<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class AdvancedCommand extends Command
{
    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('command:advance')
            ->setDescription('This command will ask you for name and surname and print them back.')
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        do {
            $name = $io->ask('Ваше имя');
        } while (null === $name);

        do {
            $surname = $io->ask('Ваша фамилия');
        } while (null === $surname);

        $io->success(\sprintf('Ваше полное имя: %s %s', $surname, $name));

        return 1;
    }
}