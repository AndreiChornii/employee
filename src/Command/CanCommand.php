<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;



class CanCommand extends Command
{
    /**
     * {@inheritDoc}
     */
    protected function configure(): void
    {
        $this
            ->setName('employee:can')
            ->setDescription('This command will ask you for profession and print can it do somthing.')
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        do {
            $name = $io->ask('Введите профессию');
        } while (null === $name);

        do {
            $can = $io->ask('Введите навык');
        } while (null === $can);

        switch ($name) {
            case 'programmer':
                $canDo = array("code writing", "code testing", "communication with manager");
                break;
            case 'designer':
                $canDo = array("draw", "communication with manager");
                break;
            case 'tester':
                $canDo = array("code testing", "draw");
                break;
            case 'manager':
                $canDo = array("set tasks");
                break;
            default:
                # code...
                break;
        }

        $rez = "false";
        foreach ($canDo as $key => $value) {
            if($value === $can) $rez = "true";
        }

        $io->success(\sprintf('Сотрудник: %s результат: %s', $name, $rez));

        return 1;
    }
}

