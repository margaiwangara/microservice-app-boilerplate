import React, { Component } from 'react';

const App = () => {
  return (
    <div>
      <Head>
        <title>Churches And Sermons | Add Profile</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
      </Head>
      <div>
        <form action="" method="post">
          <input type="text" name="name" placeholder="Name"/>
          <input type="text" name="surname" placeholder="Surname"/>
          <input type="text" name="description" placeholder="https://churchesandsermons.org"/>
          <textarea name="description" rows="10" placeholder="Description"></textarea>
        </form>
      </div>
    </div>
  )
}

export default App;