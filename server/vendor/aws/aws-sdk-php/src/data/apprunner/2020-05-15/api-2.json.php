<?php
// This file was auto-generated from sdk-root/src/data/apprunner/2020-05-15/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2020-05-15', 'endpointPrefix' => 'apprunner', 'jsonVersion' => '1.0', 'protocol' => 'json', 'serviceFullName' => 'AWS App Runner', 'serviceId' => 'AppRunner', 'signatureVersion' => 'v4', 'signingName' => 'apprunner', 'targetPrefix' => 'AppRunner', 'uid' => 'apprunner-2020-05-15', ], 'operations' => [ 'AssociateCustomDomain' => [ 'name' => 'AssociateCustomDomain', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'AssociateCustomDomainRequest', ], 'output' => [ 'shape' => 'AssociateCustomDomainResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'CreateAutoScalingConfiguration' => [ 'name' => 'CreateAutoScalingConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateAutoScalingConfigurationRequest', ], 'output' => [ 'shape' => 'CreateAutoScalingConfigurationResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'CreateConnection' => [ 'name' => 'CreateConnection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateConnectionRequest', ], 'output' => [ 'shape' => 'CreateConnectionResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'CreateService' => [ 'name' => 'CreateService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateServiceRequest', ], 'output' => [ 'shape' => 'CreateServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'CreateVpcConnector' => [ 'name' => 'CreateVpcConnector', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateVpcConnectorRequest', ], 'output' => [ 'shape' => 'CreateVpcConnectorResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ServiceQuotaExceededException', ], ], ], 'DeleteAutoScalingConfiguration' => [ 'name' => 'DeleteAutoScalingConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteAutoScalingConfigurationRequest', ], 'output' => [ 'shape' => 'DeleteAutoScalingConfigurationResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DeleteConnection' => [ 'name' => 'DeleteConnection', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteConnectionRequest', ], 'output' => [ 'shape' => 'DeleteConnectionResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DeleteService' => [ 'name' => 'DeleteService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteServiceRequest', ], 'output' => [ 'shape' => 'DeleteServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidStateException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DeleteVpcConnector' => [ 'name' => 'DeleteVpcConnector', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteVpcConnectorRequest', ], 'output' => [ 'shape' => 'DeleteVpcConnectorResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeAutoScalingConfiguration' => [ 'name' => 'DescribeAutoScalingConfiguration', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAutoScalingConfigurationRequest', ], 'output' => [ 'shape' => 'DescribeAutoScalingConfigurationResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeCustomDomains' => [ 'name' => 'DescribeCustomDomains', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeCustomDomainsRequest', ], 'output' => [ 'shape' => 'DescribeCustomDomainsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DescribeService' => [ 'name' => 'DescribeService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeServiceRequest', ], 'output' => [ 'shape' => 'DescribeServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DescribeVpcConnector' => [ 'name' => 'DescribeVpcConnector', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeVpcConnectorRequest', ], 'output' => [ 'shape' => 'DescribeVpcConnectorResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'DisassociateCustomDomain' => [ 'name' => 'DisassociateCustomDomain', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DisassociateCustomDomainRequest', ], 'output' => [ 'shape' => 'DisassociateCustomDomainResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'ListAutoScalingConfigurations' => [ 'name' => 'ListAutoScalingConfigurations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListAutoScalingConfigurationsRequest', ], 'output' => [ 'shape' => 'ListAutoScalingConfigurationsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'ListConnections' => [ 'name' => 'ListConnections', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListConnectionsRequest', ], 'output' => [ 'shape' => 'ListConnectionsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'ListOperations' => [ 'name' => 'ListOperations', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListOperationsRequest', ], 'output' => [ 'shape' => 'ListOperationsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListServices' => [ 'name' => 'ListServices', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListServicesRequest', ], 'output' => [ 'shape' => 'ListServicesResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'ListVpcConnectors' => [ 'name' => 'ListVpcConnectors', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListVpcConnectorsRequest', ], 'output' => [ 'shape' => 'ListVpcConnectorsResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'PauseService' => [ 'name' => 'PauseService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'PauseServiceRequest', ], 'output' => [ 'shape' => 'PauseServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'ResumeService' => [ 'name' => 'ResumeService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ResumeServiceRequest', ], 'output' => [ 'shape' => 'ResumeServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'StartDeployment' => [ 'name' => 'StartDeployment', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'StartDeploymentRequest', ], 'output' => [ 'shape' => 'StartDeploymentResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'output' => [ 'shape' => 'TagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'output' => [ 'shape' => 'UntagResourceResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'InvalidStateException', ], ], ], 'UpdateService' => [ 'name' => 'UpdateService', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateServiceRequest', ], 'output' => [ 'shape' => 'UpdateServiceResponse', ], 'errors' => [ [ 'shape' => 'InvalidRequestException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'InvalidStateException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], ], 'shapes' => [ 'ASConfigMaxConcurrency' => [ 'type' => 'integer', 'max' => 200, 'min' => 1, ], 'ASConfigMaxSize' => [ 'type' => 'integer', 'max' => 25, 'min' => 1, ], 'ASConfigMinSize' => [ 'type' => 'integer', 'max' => 25, 'min' => 1, ], 'AppRunnerResourceArn' => [ 'type' => 'string', 'max' => 1011, 'min' => 1, 'pattern' => 'arn:aws(-[\\w]+)*:[a-z0-9-\\\\.]{0,63}:[a-z0-9-\\\\.]{0,63}:[0-9]{12}:(\\w|\\/|-){1,1011}', ], 'AssociateCustomDomainRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', 'DomainName', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], 'EnableWWWSubdomain' => [ 'shape' => 'NullableBoolean', ], ], ], 'AssociateCustomDomainResponse' => [ 'type' => 'structure', 'required' => [ 'DNSTarget', 'ServiceArn', 'CustomDomain', ], 'members' => [ 'DNSTarget' => [ 'shape' => 'String', ], 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'CustomDomain' => [ 'shape' => 'CustomDomain', ], ], ], 'AuthenticationConfiguration' => [ 'type' => 'structure', 'members' => [ 'ConnectionArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'AccessRoleArn' => [ 'shape' => 'RoleArn', ], ], ], 'AutoScalingConfiguration' => [ 'type' => 'structure', 'members' => [ 'AutoScalingConfigurationArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'AutoScalingConfigurationName' => [ 'shape' => 'AutoScalingConfigurationName', ], 'AutoScalingConfigurationRevision' => [ 'shape' => 'Integer', ], 'Latest' => [ 'shape' => 'Boolean', ], 'Status' => [ 'shape' => 'AutoScalingConfigurationStatus', ], 'MaxConcurrency' => [ 'shape' => 'Integer', ], 'MinSize' => [ 'shape' => 'Integer', ], 'MaxSize' => [ 'shape' => 'Integer', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DeletedAt' => [ 'shape' => 'Timestamp', ], ], ], 'AutoScalingConfigurationName' => [ 'type' => 'string', 'max' => 32, 'min' => 4, 'pattern' => '[A-Za-z0-9][A-Za-z0-9\\-_]{3,31}', ], 'AutoScalingConfigurationStatus' => [ 'type' => 'string', 'enum' => [ 'ACTIVE', 'INACTIVE', ], ], 'AutoScalingConfigurationSummary' => [ 'type' => 'structure', 'members' => [ 'AutoScalingConfigurationArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'AutoScalingConfigurationName' => [ 'shape' => 'AutoScalingConfigurationName', ], 'AutoScalingConfigurationRevision' => [ 'shape' => 'Integer', ], ], ], 'AutoScalingConfigurationSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'AutoScalingConfigurationSummary', ], ], 'Boolean' => [ 'type' => 'boolean', ], 'BuildCommand' => [ 'type' => 'string', 'pattern' => '[^\\x0a\\x0d]+', 'sensitive' => true, ], 'CertificateValidationRecord' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'String', ], 'Type' => [ 'shape' => 'String', ], 'Value' => [ 'shape' => 'String', ], 'Status' => [ 'shape' => 'CertificateValidationRecordStatus', ], ], ], 'CertificateValidationRecordList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CertificateValidationRecord', ], ], 'CertificateValidationRecordStatus' => [ 'type' => 'string', 'enum' => [ 'PENDING_VALIDATION', 'SUCCESS', 'FAILED', ], ], 'CodeConfiguration' => [ 'type' => 'structure', 'required' => [ 'ConfigurationSource', ], 'members' => [ 'ConfigurationSource' => [ 'shape' => 'ConfigurationSource', ], 'CodeConfigurationValues' => [ 'shape' => 'CodeConfigurationValues', ], ], ], 'CodeConfigurationValues' => [ 'type' => 'structure', 'required' => [ 'Runtime', ], 'members' => [ 'Runtime' => [ 'shape' => 'Runtime', ], 'BuildCommand' => [ 'shape' => 'BuildCommand', ], 'StartCommand' => [ 'shape' => 'StartCommand', ], 'Port' => [ 'shape' => 'String', ], 'RuntimeEnvironmentVariables' => [ 'shape' => 'RuntimeEnvironmentVariables', ], ], ], 'CodeRepository' => [ 'type' => 'structure', 'required' => [ 'RepositoryUrl', 'SourceCodeVersion', ], 'members' => [ 'RepositoryUrl' => [ 'shape' => 'String', ], 'SourceCodeVersion' => [ 'shape' => 'SourceCodeVersion', ], 'CodeConfiguration' => [ 'shape' => 'CodeConfiguration', ], ], ], 'ConfigurationSource' => [ 'type' => 'string', 'enum' => [ 'REPOSITORY', 'API', ], ], 'Connection' => [ 'type' => 'structure', 'members' => [ 'ConnectionName' => [ 'shape' => 'ConnectionName', ], 'ConnectionArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'ProviderType' => [ 'shape' => 'ProviderType', ], 'Status' => [ 'shape' => 'ConnectionStatus', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'ConnectionName' => [ 'type' => 'string', 'max' => 32, 'min' => 4, 'pattern' => '[A-Za-z0-9][A-Za-z0-9\\-_]{3,31}', ], 'ConnectionStatus' => [ 'type' => 'string', 'enum' => [ 'PENDING_HANDSHAKE', 'AVAILABLE', 'ERROR', 'DELETED', ], ], 'ConnectionSummary' => [ 'type' => 'structure', 'members' => [ 'ConnectionName' => [ 'shape' => 'ConnectionName', ], 'ConnectionArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'ProviderType' => [ 'shape' => 'ProviderType', ], 'Status' => [ 'shape' => 'ConnectionStatus', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'ConnectionSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ConnectionSummary', ], ], 'Cpu' => [ 'type' => 'string', 'max' => 6, 'min' => 4, 'pattern' => '1024|2048|(1|2) vCPU', ], 'CreateAutoScalingConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfigurationName', ], 'members' => [ 'AutoScalingConfigurationName' => [ 'shape' => 'AutoScalingConfigurationName', ], 'MaxConcurrency' => [ 'shape' => 'ASConfigMaxConcurrency', ], 'MinSize' => [ 'shape' => 'ASConfigMinSize', ], 'MaxSize' => [ 'shape' => 'ASConfigMaxSize', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'CreateAutoScalingConfigurationResponse' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfiguration', ], 'members' => [ 'AutoScalingConfiguration' => [ 'shape' => 'AutoScalingConfiguration', ], ], ], 'CreateConnectionRequest' => [ 'type' => 'structure', 'required' => [ 'ConnectionName', 'ProviderType', ], 'members' => [ 'ConnectionName' => [ 'shape' => 'ConnectionName', ], 'ProviderType' => [ 'shape' => 'ProviderType', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'CreateConnectionResponse' => [ 'type' => 'structure', 'required' => [ 'Connection', ], 'members' => [ 'Connection' => [ 'shape' => 'Connection', ], ], ], 'CreateServiceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceName', 'SourceConfiguration', ], 'members' => [ 'ServiceName' => [ 'shape' => 'ServiceName', ], 'SourceConfiguration' => [ 'shape' => 'SourceConfiguration', ], 'InstanceConfiguration' => [ 'shape' => 'InstanceConfiguration', ], 'Tags' => [ 'shape' => 'TagList', ], 'EncryptionConfiguration' => [ 'shape' => 'EncryptionConfiguration', ], 'HealthCheckConfiguration' => [ 'shape' => 'HealthCheckConfiguration', ], 'AutoScalingConfigurationArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'NetworkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], ], ], 'CreateServiceResponse' => [ 'type' => 'structure', 'required' => [ 'Service', 'OperationId', ], 'members' => [ 'Service' => [ 'shape' => 'Service', ], 'OperationId' => [ 'shape' => 'UUID', ], ], ], 'CreateVpcConnectorRequest' => [ 'type' => 'structure', 'required' => [ 'VpcConnectorName', 'Subnets', ], 'members' => [ 'VpcConnectorName' => [ 'shape' => 'VpcConnectorName', ], 'Subnets' => [ 'shape' => 'StringList', ], 'SecurityGroups' => [ 'shape' => 'StringList', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'CreateVpcConnectorResponse' => [ 'type' => 'structure', 'required' => [ 'VpcConnector', ], 'members' => [ 'VpcConnector' => [ 'shape' => 'VpcConnector', ], ], ], 'CustomDomain' => [ 'type' => 'structure', 'required' => [ 'DomainName', 'EnableWWWSubdomain', 'Status', ], 'members' => [ 'DomainName' => [ 'shape' => 'DomainName', ], 'EnableWWWSubdomain' => [ 'shape' => 'NullableBoolean', ], 'CertificateValidationRecords' => [ 'shape' => 'CertificateValidationRecordList', ], 'Status' => [ 'shape' => 'CustomDomainAssociationStatus', ], ], ], 'CustomDomainAssociationStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'CREATE_FAILED', 'ACTIVE', 'DELETING', 'DELETE_FAILED', 'PENDING_CERTIFICATE_DNS_VALIDATION', 'BINDING_CERTIFICATE', ], ], 'CustomDomainList' => [ 'type' => 'list', 'member' => [ 'shape' => 'CustomDomain', ], ], 'DeleteAutoScalingConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfigurationArn', ], 'members' => [ 'AutoScalingConfigurationArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DeleteAutoScalingConfigurationResponse' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfiguration', ], 'members' => [ 'AutoScalingConfiguration' => [ 'shape' => 'AutoScalingConfiguration', ], ], ], 'DeleteConnectionRequest' => [ 'type' => 'structure', 'required' => [ 'ConnectionArn', ], 'members' => [ 'ConnectionArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DeleteConnectionResponse' => [ 'type' => 'structure', 'members' => [ 'Connection' => [ 'shape' => 'Connection', ], ], ], 'DeleteServiceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DeleteServiceResponse' => [ 'type' => 'structure', 'required' => [ 'Service', 'OperationId', ], 'members' => [ 'Service' => [ 'shape' => 'Service', ], 'OperationId' => [ 'shape' => 'UUID', ], ], ], 'DeleteVpcConnectorRequest' => [ 'type' => 'structure', 'required' => [ 'VpcConnectorArn', ], 'members' => [ 'VpcConnectorArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DeleteVpcConnectorResponse' => [ 'type' => 'structure', 'required' => [ 'VpcConnector', ], 'members' => [ 'VpcConnector' => [ 'shape' => 'VpcConnector', ], ], ], 'DescribeAutoScalingConfigurationRequest' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfigurationArn', ], 'members' => [ 'AutoScalingConfigurationArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DescribeAutoScalingConfigurationResponse' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfiguration', ], 'members' => [ 'AutoScalingConfiguration' => [ 'shape' => 'AutoScalingConfiguration', ], ], ], 'DescribeCustomDomainsMaxResults' => [ 'type' => 'integer', 'max' => 5, 'min' => 1, ], 'DescribeCustomDomainsRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'NextToken' => [ 'shape' => 'String', ], 'MaxResults' => [ 'shape' => 'DescribeCustomDomainsMaxResults', ], ], ], 'DescribeCustomDomainsResponse' => [ 'type' => 'structure', 'required' => [ 'DNSTarget', 'ServiceArn', 'CustomDomains', ], 'members' => [ 'DNSTarget' => [ 'shape' => 'String', ], 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'CustomDomains' => [ 'shape' => 'CustomDomainList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'DescribeServiceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DescribeServiceResponse' => [ 'type' => 'structure', 'required' => [ 'Service', ], 'members' => [ 'Service' => [ 'shape' => 'Service', ], ], ], 'DescribeVpcConnectorRequest' => [ 'type' => 'structure', 'required' => [ 'VpcConnectorArn', ], 'members' => [ 'VpcConnectorArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'DescribeVpcConnectorResponse' => [ 'type' => 'structure', 'required' => [ 'VpcConnector', ], 'members' => [ 'VpcConnector' => [ 'shape' => 'VpcConnector', ], ], ], 'DisassociateCustomDomainRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', 'DomainName', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'DomainName' => [ 'shape' => 'DomainName', ], ], ], 'DisassociateCustomDomainResponse' => [ 'type' => 'structure', 'required' => [ 'DNSTarget', 'ServiceArn', 'CustomDomain', ], 'members' => [ 'DNSTarget' => [ 'shape' => 'String', ], 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'CustomDomain' => [ 'shape' => 'CustomDomain', ], ], ], 'DomainName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '[A-Za-z0-9*.-]{1,255}', ], 'EgressConfiguration' => [ 'type' => 'structure', 'members' => [ 'EgressType' => [ 'shape' => 'EgressType', ], 'VpcConnectorArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'EgressType' => [ 'type' => 'string', 'enum' => [ 'DEFAULT', 'VPC', ], ], 'EncryptionConfiguration' => [ 'type' => 'structure', 'required' => [ 'KmsKey', ], 'members' => [ 'KmsKey' => [ 'shape' => 'KmsKeyArn', ], ], ], 'ErrorMessage' => [ 'type' => 'string', 'max' => 600, ], 'HealthCheckConfiguration' => [ 'type' => 'structure', 'members' => [ 'Protocol' => [ 'shape' => 'HealthCheckProtocol', ], 'Path' => [ 'shape' => 'HealthCheckPath', ], 'Interval' => [ 'shape' => 'HealthCheckInterval', ], 'Timeout' => [ 'shape' => 'HealthCheckTimeout', ], 'HealthyThreshold' => [ 'shape' => 'HealthCheckHealthyThreshold', ], 'UnhealthyThreshold' => [ 'shape' => 'HealthCheckUnhealthyThreshold', ], ], ], 'HealthCheckHealthyThreshold' => [ 'type' => 'integer', 'max' => 20, 'min' => 1, ], 'HealthCheckInterval' => [ 'type' => 'integer', 'max' => 20, 'min' => 1, ], 'HealthCheckPath' => [ 'type' => 'string', 'min' => 1, ], 'HealthCheckProtocol' => [ 'type' => 'string', 'enum' => [ 'TCP', 'HTTP', ], ], 'HealthCheckTimeout' => [ 'type' => 'integer', 'max' => 20, 'min' => 1, ], 'HealthCheckUnhealthyThreshold' => [ 'type' => 'integer', 'max' => 20, 'min' => 1, ], 'ImageConfiguration' => [ 'type' => 'structure', 'members' => [ 'RuntimeEnvironmentVariables' => [ 'shape' => 'RuntimeEnvironmentVariables', ], 'StartCommand' => [ 'shape' => 'StartCommand', ], 'Port' => [ 'shape' => 'String', ], ], ], 'ImageIdentifier' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '([0-9]{12}.dkr.ecr.[a-z\\-]+-[0-9]{1}.amazonaws.com\\/((?:[a-z0-9]+(?:[._-][a-z0-9]+)*\\/)*[a-z0-9]+(?:[._-][a-z0-9]+)*)(:([\\w\\d+\\-=._:\\/@])+|@([\\w\\d\\:]+))?)|(^public\\.ecr\\.aws\\/.+\\/((?:[a-z0-9]+(?:[._-][a-z0-9]+)*\\/)*[a-z0-9]+(?:[._-][a-z0-9]+)*)(:([\\w\\d+\\-=._:\\/@])+|@([\\w\\d\\:]+))?)', ], 'ImageRepository' => [ 'type' => 'structure', 'required' => [ 'ImageIdentifier', 'ImageRepositoryType', ], 'members' => [ 'ImageIdentifier' => [ 'shape' => 'ImageIdentifier', ], 'ImageConfiguration' => [ 'shape' => 'ImageConfiguration', ], 'ImageRepositoryType' => [ 'shape' => 'ImageRepositoryType', ], ], ], 'ImageRepositoryType' => [ 'type' => 'string', 'enum' => [ 'ECR', 'ECR_PUBLIC', ], ], 'InstanceConfiguration' => [ 'type' => 'structure', 'members' => [ 'Cpu' => [ 'shape' => 'Cpu', ], 'Memory' => [ 'shape' => 'Memory', ], 'InstanceRoleArn' => [ 'shape' => 'RoleArn', ], ], ], 'Integer' => [ 'type' => 'integer', ], 'InternalServiceErrorException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, 'fault' => true, ], 'InvalidRequestException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidStateException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'KmsKeyArn' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => 'arn:aws(-[\\w]+)*:kms:[a-z\\-]+-[0-9]{1}:[0-9]{12}:key\\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}', ], 'ListAutoScalingConfigurationsRequest' => [ 'type' => 'structure', 'members' => [ 'AutoScalingConfigurationName' => [ 'shape' => 'AutoScalingConfigurationName', ], 'LatestOnly' => [ 'shape' => 'Boolean', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListAutoScalingConfigurationsResponse' => [ 'type' => 'structure', 'required' => [ 'AutoScalingConfigurationSummaryList', ], 'members' => [ 'AutoScalingConfigurationSummaryList' => [ 'shape' => 'AutoScalingConfigurationSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListConnectionsRequest' => [ 'type' => 'structure', 'members' => [ 'ConnectionName' => [ 'shape' => 'ConnectionName', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListConnectionsResponse' => [ 'type' => 'structure', 'required' => [ 'ConnectionSummaryList', ], 'members' => [ 'ConnectionSummaryList' => [ 'shape' => 'ConnectionSummaryList', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListOperationsMaxResults' => [ 'type' => 'integer', 'max' => 20, 'min' => 1, ], 'ListOperationsRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'NextToken' => [ 'shape' => 'String', ], 'MaxResults' => [ 'shape' => 'ListOperationsMaxResults', ], ], ], 'ListOperationsResponse' => [ 'type' => 'structure', 'members' => [ 'OperationSummaryList' => [ 'shape' => 'OperationSummaryList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListServicesRequest' => [ 'type' => 'structure', 'members' => [ 'NextToken' => [ 'shape' => 'String', ], 'MaxResults' => [ 'shape' => 'ServiceMaxResults', ], ], ], 'ListServicesResponse' => [ 'type' => 'structure', 'required' => [ 'ServiceSummaryList', ], 'members' => [ 'ServiceSummaryList' => [ 'shape' => 'ServiceSummaryList', ], 'NextToken' => [ 'shape' => 'String', ], ], ], 'ListTagsForResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'ListTagsForResourceResponse' => [ 'type' => 'structure', 'members' => [ 'Tags' => [ 'shape' => 'TagList', ], ], ], 'ListVpcConnectorsRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'ListVpcConnectorsResponse' => [ 'type' => 'structure', 'required' => [ 'VpcConnectors', ], 'members' => [ 'VpcConnectors' => [ 'shape' => 'VpcConnectors', ], 'NextToken' => [ 'shape' => 'NextToken', ], ], ], 'MaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'Memory' => [ 'type' => 'string', 'max' => 4, 'min' => 4, 'pattern' => '2048|3072|4096|(2|3|4) GB', ], 'NetworkConfiguration' => [ 'type' => 'structure', 'members' => [ 'EgressConfiguration' => [ 'shape' => 'EgressConfiguration', ], ], ], 'NextToken' => [ 'type' => 'string', 'max' => 1024, 'min' => 1, 'pattern' => '.*', ], 'NullableBoolean' => [ 'type' => 'boolean', ], 'OperationStatus' => [ 'type' => 'string', 'enum' => [ 'PENDING', 'IN_PROGRESS', 'FAILED', 'SUCCEEDED', 'ROLLBACK_IN_PROGRESS', 'ROLLBACK_FAILED', 'ROLLBACK_SUCCEEDED', ], ], 'OperationSummary' => [ 'type' => 'structure', 'members' => [ 'Id' => [ 'shape' => 'UUID', ], 'Type' => [ 'shape' => 'OperationType', ], 'Status' => [ 'shape' => 'OperationStatus', ], 'TargetArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'StartedAt' => [ 'shape' => 'Timestamp', ], 'EndedAt' => [ 'shape' => 'Timestamp', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], ], ], 'OperationSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'OperationSummary', ], ], 'OperationType' => [ 'type' => 'string', 'enum' => [ 'START_DEPLOYMENT', 'CREATE_SERVICE', 'PAUSE_SERVICE', 'RESUME_SERVICE', 'DELETE_SERVICE', ], ], 'PauseServiceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'PauseServiceResponse' => [ 'type' => 'structure', 'required' => [ 'Service', ], 'members' => [ 'Service' => [ 'shape' => 'Service', ], 'OperationId' => [ 'shape' => 'UUID', ], ], ], 'ProviderType' => [ 'type' => 'string', 'enum' => [ 'GITHUB', ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ResumeServiceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'ResumeServiceResponse' => [ 'type' => 'structure', 'required' => [ 'Service', ], 'members' => [ 'Service' => [ 'shape' => 'Service', ], 'OperationId' => [ 'shape' => 'UUID', ], ], ], 'RoleArn' => [ 'type' => 'string', 'max' => 1024, 'min' => 29, 'pattern' => 'arn:(aws|aws-us-gov|aws-cn|aws-iso|aws-iso-b):iam::[0-9]{12}:(role|role\\/service-role)\\/[\\w+=,.@\\-/]{1,1000}', ], 'Runtime' => [ 'type' => 'string', 'enum' => [ 'PYTHON_3', 'NODEJS_12', 'NODEJS_14', 'CORRETTO_8', 'CORRETTO_11', ], ], 'RuntimeEnvironmentVariables' => [ 'type' => 'map', 'key' => [ 'shape' => 'RuntimeEnvironmentVariablesKey', ], 'value' => [ 'shape' => 'RuntimeEnvironmentVariablesValue', ], ], 'RuntimeEnvironmentVariablesKey' => [ 'type' => 'string', 'max' => 51200, 'min' => 1, 'pattern' => '.*', 'sensitive' => true, ], 'RuntimeEnvironmentVariablesValue' => [ 'type' => 'string', 'max' => 51200, 'min' => 0, 'pattern' => '.*', 'sensitive' => true, ], 'Service' => [ 'type' => 'structure', 'required' => [ 'ServiceName', 'ServiceId', 'ServiceArn', 'ServiceUrl', 'CreatedAt', 'UpdatedAt', 'Status', 'SourceConfiguration', 'InstanceConfiguration', 'AutoScalingConfigurationSummary', 'NetworkConfiguration', ], 'members' => [ 'ServiceName' => [ 'shape' => 'ServiceName', ], 'ServiceId' => [ 'shape' => 'ServiceId', ], 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'ServiceUrl' => [ 'shape' => 'String', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], 'DeletedAt' => [ 'shape' => 'Timestamp', ], 'Status' => [ 'shape' => 'ServiceStatus', ], 'SourceConfiguration' => [ 'shape' => 'SourceConfiguration', ], 'InstanceConfiguration' => [ 'shape' => 'InstanceConfiguration', ], 'EncryptionConfiguration' => [ 'shape' => 'EncryptionConfiguration', ], 'HealthCheckConfiguration' => [ 'shape' => 'HealthCheckConfiguration', ], 'AutoScalingConfigurationSummary' => [ 'shape' => 'AutoScalingConfigurationSummary', ], 'NetworkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], ], ], 'ServiceId' => [ 'type' => 'string', 'max' => 32, 'min' => 32, 'pattern' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}', ], 'ServiceMaxResults' => [ 'type' => 'integer', 'max' => 20, 'min' => 1, ], 'ServiceName' => [ 'type' => 'string', 'max' => 40, 'min' => 4, 'pattern' => '[A-Za-z0-9][A-Za-z0-9-_]{3,39}', ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ServiceStatus' => [ 'type' => 'string', 'enum' => [ 'CREATE_FAILED', 'RUNNING', 'DELETED', 'DELETE_FAILED', 'PAUSED', 'OPERATION_IN_PROGRESS', ], ], 'ServiceSummary' => [ 'type' => 'structure', 'members' => [ 'ServiceName' => [ 'shape' => 'ServiceName', ], 'ServiceId' => [ 'shape' => 'ServiceId', ], 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'ServiceUrl' => [ 'shape' => 'String', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'UpdatedAt' => [ 'shape' => 'Timestamp', ], 'Status' => [ 'shape' => 'ServiceStatus', ], ], ], 'ServiceSummaryList' => [ 'type' => 'list', 'member' => [ 'shape' => 'ServiceSummary', ], ], 'SourceCodeVersion' => [ 'type' => 'structure', 'required' => [ 'Type', 'Value', ], 'members' => [ 'Type' => [ 'shape' => 'SourceCodeVersionType', ], 'Value' => [ 'shape' => 'String', ], ], ], 'SourceCodeVersionType' => [ 'type' => 'string', 'enum' => [ 'BRANCH', ], ], 'SourceConfiguration' => [ 'type' => 'structure', 'members' => [ 'CodeRepository' => [ 'shape' => 'CodeRepository', ], 'ImageRepository' => [ 'shape' => 'ImageRepository', ], 'AutoDeploymentsEnabled' => [ 'shape' => 'NullableBoolean', ], 'AuthenticationConfiguration' => [ 'shape' => 'AuthenticationConfiguration', ], ], ], 'StartCommand' => [ 'type' => 'string', 'pattern' => '[^\\x0a\\x0d]+', 'sensitive' => true, ], 'StartDeploymentRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], ], ], 'StartDeploymentResponse' => [ 'type' => 'structure', 'required' => [ 'OperationId', ], 'members' => [ 'OperationId' => [ 'shape' => 'UUID', ], ], ], 'String' => [ 'type' => 'string', 'max' => 51200, 'min' => 0, 'pattern' => '.*', ], 'StringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'Tag' => [ 'type' => 'structure', 'members' => [ 'Key' => [ 'shape' => 'TagKey', ], 'Value' => [ 'shape' => 'TagValue', ], ], ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, 'pattern' => '^(?!aws:).+', ], 'TagKeyList' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], ], 'TagList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Tag', ], ], 'TagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'Tags', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'Tags' => [ 'shape' => 'TagList', ], ], ], 'TagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, 'pattern' => '.*', ], 'Timestamp' => [ 'type' => 'timestamp', ], 'UUID' => [ 'type' => 'string', 'max' => 36, 'min' => 36, 'pattern' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}', ], 'UntagResourceRequest' => [ 'type' => 'structure', 'required' => [ 'ResourceArn', 'TagKeys', ], 'members' => [ 'ResourceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'TagKeys' => [ 'shape' => 'TagKeyList', ], ], ], 'UntagResourceResponse' => [ 'type' => 'structure', 'members' => [], ], 'UpdateServiceRequest' => [ 'type' => 'structure', 'required' => [ 'ServiceArn', ], 'members' => [ 'ServiceArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'SourceConfiguration' => [ 'shape' => 'SourceConfiguration', ], 'InstanceConfiguration' => [ 'shape' => 'InstanceConfiguration', ], 'AutoScalingConfigurationArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'HealthCheckConfiguration' => [ 'shape' => 'HealthCheckConfiguration', ], 'NetworkConfiguration' => [ 'shape' => 'NetworkConfiguration', ], ], ], 'UpdateServiceResponse' => [ 'type' => 'structure', 'required' => [ 'Service', 'OperationId', ], 'members' => [ 'Service' => [ 'shape' => 'Service', ], 'OperationId' => [ 'shape' => 'UUID', ], ], ], 'VpcConnector' => [ 'type' => 'structure', 'members' => [ 'VpcConnectorName' => [ 'shape' => 'VpcConnectorName', ], 'VpcConnectorArn' => [ 'shape' => 'AppRunnerResourceArn', ], 'VpcConnectorRevision' => [ 'shape' => 'Integer', ], 'Subnets' => [ 'shape' => 'StringList', ], 'SecurityGroups' => [ 'shape' => 'StringList', ], 'Status' => [ 'shape' => 'VpcConnectorStatus', ], 'CreatedAt' => [ 'shape' => 'Timestamp', ], 'DeletedAt' => [ 'shape' => 'Timestamp', ], ], ], 'VpcConnectorName' => [ 'type' => 'string', 'max' => 40, 'min' => 4, 'pattern' => '[A-Za-z0-9][A-Za-z0-9\\-_]{3,39}', ], 'VpcConnectorStatus' => [ 'type' => 'string', 'enum' => [ 'ACTIVE', 'INACTIVE', ], ], 'VpcConnectors' => [ 'type' => 'list', 'member' => [ 'shape' => 'VpcConnector', ], ], ],];