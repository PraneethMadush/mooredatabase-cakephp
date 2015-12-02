<?php
	$this->set('pageId', 'education');
	$this->set('title_for_layout', 'Education');
?>
<div data-role="content">
	<div data-role="collapsible-set">
		<div data-role="collapsible" data-collapsed="false">
			<h3>College</h3>
			<p>
				<strong>University of Minnesota, Minneapolis, MN</strong> <br />
				BS Economics, 1986 <br />
				3.86 GPA <br />
				Dean's List, Undergraduate Teaching Assistantship
			</p>
			<?php echo $this->Html->image('umin-logo.jpg', array('alt' => 'U of M Logo','class' => 'logo', 'style' => 'width:100px;height:100px;')); ?>
		</div>
		<div data-role="collapsible">
			<h3>MS Certifications</h3>
			<ul>
				<li>MCITP: Database Developer 2008</li>
				<li>MCTS: SQL Server 2008 Database Development</li>
				<li>MCSD</li>
				<li>MCP</li>
			</ul>
			<?php echo $this->Html->image('mcitp.png', array('alt' => 'MCITP Logo','class' => 'logo')); ?>
		</div>
		<div data-role="collapsible">
			<h3>MS Exams</h3>
			<ul class="content_list">
				<li class="content_li">Designing Database Solutions and Data Access Using Microsoft SQL Server 2008</li>
				<li class="content_li">Microsoft SQL Server 2008 Database Development</li>
				<li class="content_li">Designing and Implementing Databases with Microsoft SQL Server 2000 Enterprise Edition</li>
				<li class="content_li">Designing and Implementing Web Solutions with Microsoft Visual InterDev 6.0</li>
				<li class="content_li">Analyzing Requirements and Defining Solution Architectures</li>
				<li class="content_li">Designing and Implementing Distributed Applications with Microsoft Visual Basic 6.0</li>
				<li class="content_li">Designing and Implementing Desktop Applications with Microsoft Visual Basic 6.0</li>
				<li class="content_li">Administering Microsoft SQL Server 7.0</li>
				<li class="content_li">Designing and Implementing Databases with Microsoft SQL Server 7.0</li>
				<li class="content_li">System Administration of Microsoft SQL Server 6.5</li>
				<li class="content_li">Implementing a Database Design on Microsoft SQL Server 6.5</li>
				<li class="content_li">Microsoft Access for Windows 95 and the Microsoft Access Developer&rsquo;s Toolkit</li>
			</ul>
		</div>
		<div data-role="collapsible">
			<h3>Military Experience</h3>
			<p>
				<strong>Defense Language Institute, Monterey, CA</strong> <br /> Basic Russian Course, 1976 <br /> Honor Graduate
			</p>
			<?php echo $this->Html->image('dli_logo.jpg', array('alt' => 'DLI Crest','class' => 'logo', 'style' => 'height:100px;')); ?>
			<p>
				<strong>USAF School of Applied Cryptologic Sciences, San Angelo, TX</strong> <br /> Honor Graduate, 1976
			</p>
			<p>
				<strong>US Naval Communications Station, Rota, Spain</strong> <br />
				January 1977 – June 1979 <br />
				Cryptologic Technician / Russian Interpreter <br />
				Collected and interpreted Russian-language materials aboard reconnaissance aircraft, employing a variety of electronic
				equipment. Cited for outstanding language proficiency. Position required a Top Secret security clearance. Achieved the rank of Petty
				Officer Second Class. Awarded Good Conduct Medal, Naval Expeditionary Medal, and Aircrewman designation. Honorable Discharge. Went to
				college on the GI Bill after discharge.
			</p>
			<?php echo $this->Html->image('navy-logo.png', array('alt' => 'Navy Logo','class' => 'logo', 'style' => "width:100px;height:100px;")); ?>
		</div>
	</div>
</div>