# 1. Record architecture decisions

- **Status:** Accepted
- **Date Created:** DATE
- **Date Updated:** DATE
- **Deciders:**
  - [Your name]()
- Authors:
  - [Your name]()

## Problem Statement

We need to make a lot of decisions that will significantly impact this project. When faced with making a choice from more than one options, we want to record why we selected one over the others and what Implications/consequences that decision would have on the project. 


## Decision

### Deciding Factors

- Offline accessibility: We want to record decisions anytime/anywhere with or without internet
- Collocate decisions with the project: Avoid switching between context/multiple apps
- Version Controlled: Able to see whem, who, what changed with every revision
- Collaboration: Multiple people can collaborate and record the decision

### Viable Options

- [GitHub Issues](https:github.com)
  example | usage | code-samples | images

  - **Pros:**
    - Collaboration with multiple people
  - **Cons:**
    - Needs internet connection
  - **Neutral:**
    - Requires creating GitHub accounts to access the decision records

- [ADRs](https://adr.github.io/)
  example | usage | code-samples | images

  - **Pros:**
    - Works Offline
    - Collocated with source code and documentation
    - Accessible to everyone who has access to the docs
  - **Cons:**
    - Lacks mentions and notifications: `@someone`
  - **Neutral:**
    - Written in plain markdown

### Final Decision Made

**Chosen Option:** [ADRs](https://adr.github.io/)

**Why:**

- It is easier to record new decisions.
- Works offline 
- No special editors to tooling required 
- Specific format/structure to ensure consistency

### Implications

- Every decision taken concerning this projects needs to be recorded. Every Viable option should be considered and properly evaluated. You don't want to hear the question "Did you consider this option?" during the final review as this leads to loss of credibility and question of other architectural decisions.


## Notes

Learn more about the importance of ADRs:
1. [ADR GitHub Organization](https://adr.github.io/)
2. [ADR Templates](https://github.com/joelparkerhenderson/architecture-decision-record)
3. [ADR Tooling](https://adr.github.io/adr-tooling/)
4. [Laravel ADR Tools](https://packagist.org/packages/parables/laravel-adr-tools)

## Glossary

- Term: definition
- ADR: Architectural Decision Record
- AD: Architectural Decision
- ASR:  [Architecturally Significant Requirement (ASR)](https://en.wikipedia.org/wiki/Architecturally_significant_requirements)


