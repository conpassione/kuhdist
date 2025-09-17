<?php

declare(strict_types=1);

namespace Conpassione\kuhdist\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;


#[AsCommand(
    name: 'kuh:remove-missingfilerelations',
    description: 'Remove missing FAL-file relations',
    aliases: ['kuh:removemissingfilerelations']
)]
class RemoveMissingFileRelationsCommand extends Command
{
    protected function configure(): void
    {
        $this->setHelp('Remove missing FAL-file relations');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        Bootstrap::initializeBackendAuthentication();

        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $connection = $connectionPool->getConnectionByName('Default');
        $sql = 'DELETE FROM sys_file WHERE sys_file.missing = 1 AND sys_file.uid NOT IN(SELECT sys_file_reference.uid_local FROM sys_file_reference WHERE sys_file_reference.uid = sys_file.uid)';
        $statement = $connection->executeStatement($sql);

        $io = new SymfonyStyle($input, $output);
        $io->title('Removing missing FAL-file relations from site');
        if ($statement > 0) {
            $io->note($statement . ' File(s) successfully removed.');
        } else {
            $io->note('No Files found to remove.');
        }
        return Command::SUCCESS;
    }
}
