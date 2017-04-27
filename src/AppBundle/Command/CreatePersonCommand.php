<?php

namespace AppBundle\Command;

use AppBundle\Entity\Player;
use AppBundle\Entity\Worker;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePersonCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('createPerson')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }

        $worker = new Worker();
        $worker->setName('Peter');
        $worker->setAccess('open');

        $player = new Player();
        $player->setName('John');
        $player->setLevel(80);

        $em = $this->getContainer()->get('doctrine')->getManager();
        $em->persist($worker);
        $em->persist($player);
        $em->flush();

        $output->writeln('Command result.');
    }

}
