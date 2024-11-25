const formDynamic = document?.querySelector("#dynamic-form");
const addTraining = document?.querySelector("#add-training");
const addBasicLicense = document?.querySelector("#add-basic-license");
const addAircraftType = document?.querySelector("#add-aircraft-type");

addBasicLicense?.addEventListener("click", (evt) => {
  evt.preventDefault();
  const formRow = `
          <div class="row mb-3 align-items-start">
            <div class="col-5 col-md-4">
              <div class="form-floating mb-3 mb-md-0">
                <input
                  class="form-control"
                  type="text"
                  placeholder="Enter your category"
                  name="category[]"
                  />
                <label>Category</label>
              </div>
            </div>
            <div class="col-5 col-md-4">
              <div class="form-floating">
                <input
                  class="form-control"
                  type="string"
                  placeholder="Enter your card no."
                  name="card_no[]"
                  />
                <label>Card No.</label>
              </div>
            </div>
            <div
              class="col-2 col-md-3 d-flex align-items-center justify-content-center justify-content-sm-start"
              style="height: 58px"
            >
              <button
                type="button"
                class="btn btn-danger btn-sm"
                onclick="removeRow(this)"
              >
                <i class="fa-regular fa-trash-can"></i>
              </button>
            </div>
          </div>
        `;

  formDynamic.insertAdjacentHTML("beforeend", formRow);
});
addTraining?.addEventListener("click", (evt) => {
  evt.preventDefault();
  const formRow = `
          <div class="row mb-3 align-items-start">
            <div class="col-5 col-md-4">
              <div class="form-floating mb-3 mb-md-0">
                <input
                  class="form-control"
                  type="text"
                  placeholder="Enter your course"
                  name="course[]"
                />
                <label>Course</label>
              </div>
            </div>
            <div class="col-5 col-md-4">
              <div class="form-floating">
                <input
                  class="form-control"
                  type="number"
                  placeholder="Enter your year"
                  name="year[]"
                />
                <label>Year</label>
              </div>
            </div>
            <div
              class="col-2 col-md-3 d-flex align-items-center justify-content-center justify-content-sm-start"
              style="height: 58px"
            >
              <button
                type="button"
                class="btn btn-danger btn-sm"
                onclick="removeRow(this)"
              >
                <i class="fa-regular fa-trash-can"></i>
              </button>
            </div>
          </div>
        `;

  formDynamic.insertAdjacentHTML("beforeend", formRow);
});
addAircraftType?.addEventListener("click", (evt) => {
  evt.preventDefault();
  const formRow = `
          <div class="row mb-3 align-items-start">
            <div class="col-10 col-md-11">
                <div class="form-floating mb-3 mb-md-0">
                    <input
                    class="form-control"
                    type="text"
                    placeholder="Enter your aircraft type"
                    name="name[]"
                    />
                    <label>Aircraft Type</label>
                </div>
            </div>
            <div
              class="col-2 col-md-1 d-flex align-items-center justify-content-start"
              style="height: 58px"
            >
                <button
                    type="button"
                    class="btn btn-danger btn-sm"
                    onclick="removeRow(this)"
                >
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </div>
        </div>
        `;

  formDynamic.insertAdjacentHTML("beforeend", formRow);
});

function removeRow(button) {
  button.parentElement.parentElement.remove();
}